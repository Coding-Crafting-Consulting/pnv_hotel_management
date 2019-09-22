<?php

namespace App\Http\Controllers;
use Session;
use Mail;
use App\Mail\SendEmail;
use App\Booking;
use App\User;
use App\BookingType;
use App\Room;
use App\BookingPurpose;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkIfAllowed', ['except' => ['create', 'store', 'update']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //   $bookings = User::with(['bookings' => function ($booking) { $booking->orderBy('id'); }])
      //   ->get();
    
      // return view('booking/index', compact('bookings'));
      // 
      $bookingPurposes = BookingPurpose::with(['bookings' => function ($booking) { $booking->orderBy('id'); }])
        ->orderBy('id')
        ->get();
    
      return view('booking/index', compact('bookingPurposes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {       
        $booking = new Booking;
        $users = User::orderBy('id')->get();
        $bookingTypes = BookingType::orderBy('id')->get();
        $room = Room::find($request->get('roomId'));
        $rooms = Room::orderBy('number')->get();
        $bookingPurposes = BookingPurpose::orderBy('id')->get();

        return view(
          'booking/create',
          compact('room','rooms','booking', 'users', 'bookingTypes', 'bookingPurposes')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    { 
      $booking = new Booking($request->all());
      $booking->save();
      return Auth::check() && Auth::user()->hasAdminRights() ?
          redirect()->route('bookings.index')->with('success','Add success!') :
          redirect()->route('home')->with('success','Add success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
       return view('booking/show', compact('booking','bookingPurposes'));
        return redirect()->route('booking.index')->with('success','Add success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking, Request $request)
    {
        if (!Auth::check()) {

          return view('forbidden');
        
        } elseif (Auth::user()->hasAdminRights()) {

        } elseif (Auth::id() != $user->id) {

          return view('forbidden');

        }

        $users = User::orderBy('id')->get();
        $rooms = Room::orderBy('number')->get();
        $bookingTypes = BookingType::orderBy('id')->get();
        $bookingPurposes = BookingPurpose::orderBy('id')->get();

        return view(
          'booking/edit',
          compact('booking', 'users', 'rooms', 'bookingTypes', 'bookingPurposes')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        if (!Auth::check()) {

          return view('forbidden');
        
        } elseif (Auth::user()->hasAdminRights()) {

        } elseif (Auth::id() != $user->id) {

          return view('forbidden');

        }

      $booking->update($request->all());

      // if user has admin rights and is not editing him/herself
      return Auth::check() && Auth::user()->hasAdminRights() ?
          redirect()->route('bookings.index')->with('success','Successfully updated!') :
          redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
       $booking->delete();
        return "ok";
    }
}
