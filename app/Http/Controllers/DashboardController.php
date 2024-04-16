<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Clients;
use App\Models\KeysPlaces;
use App\Models\Nationalities;
use App\Models\UsersChoices;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {

                $query = Clients::all();

                $count = $query->count();
                $query = $query->take($count);

                $table = DataTables::of($query);

                $table->editColumn('id',function($row){
                    return $row->id;
                });

                $table->addColumn('client_date', function ($row) {
                    $userChoice = UsersChoices::where('user_id', $row->id)
                        ->first();
                
                    if ($userChoice) {
                        $originalDate = Carbon::parse($userChoice->date);
                        return $originalDate->format('Y-m-d h:i A');
                    } else {
                        return '';
                    }
                });

                $table->editColumn('fullname', function ($row) {
                    $fullname = $row->fname ? $row->fname . ' ' . $row->lname : '';
                    $firstletter = $row->fname ? mb_substr($row->fname, 0, 1, 'UTF-8') : '';                    return '<div class="d-flex">
                        <div style="
                            height: 40px;
                            width: 40px;
                            background-color: #ffae1f;
                            color:white;
                            border-radius: 50%;
                            padding: 2px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                        ">
                            ' . $firstletter . '
                        </div>
                        <div style="padding:10px">' . $fullname . '</div>
                    </div>';
                });

                $table->editColumn('phone', function ($row) {
                    return $row->phone_number ? $row->phone_code . $row->phone_number : '';
                });


                $table->editColumn('email', function ($row) {
                    return $row->email ?? $row->email;
                });

                $table->addColumn('nationality', function ($row) {
                    if ($row->nationality_id) {
                        $nationality = Nationalities::where('country_code', $row->nationality_id)->first()->country_name;
                        return $nationality;
                    } else {
                        return '';
                    }
                });

                $table->addColumn('answers', function ($row) {
                    return '<a style="cursor:pointer" 
                   class="show_answers"
                   data-id="'.$row->id.'"
                   data-fullname="'.$row->fname.' '.$row->lname.'"
                   data-toggle="modal" data-target="#answersModal">
                   <i class="fa fa-eye"></i>
                   </a>';
                });

                $table->rawColumns(['fullname', 'answers']);
                return $table->make(true);
            }
            return view('dashboard');
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function getAnswers(Request $request)
    {
        try {
            $client_id = $request->client_id;
            $key_array = [];
            // Fetch guesses from the database
            $answers = Answers::join('clients', 'clients.id', '=', 'users_choices.user_id')
                ->where('user_id', $client_id)
                ->select('users_choices.guesses')
                ->first();

            if ($answers) {
                // Decode JSON string to an array
                $array_answers = json_decode($answers->guesses);

                // Check if decoding was successful
                if ($array_answers !== null) {
                    // Loop through the array and fetch data from KeysPlaces
                    foreach ($array_answers as $answer) {
                        $keyname = KeysPlaces::find((int) $answer);
                        // Check if KeysPlaces record exists
                        if ($keyname) {
                            $key_array[] = $keyname->english_name;
                        }
                    }
                    return response([
                        'success' => true,
                        'data' => $key_array
                    ]);
                } else {
                    echo "Error decoding guesses JSON<br/>";
                }
            } else {
                echo "No guesses found for user $client_id<br/>";
            }
        } catch (Exception $e) {
            echo $e;
        }
    }
}
