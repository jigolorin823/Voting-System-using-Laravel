@extends('layouts.app1')

@section('content')
    @if (Route::has('login'))
        @auth
            <div class="container">
                <table  width="100%">
                    <tbody>
                    <form action="{{ route('voter.changepass') }}" method="POST">
                    @csrf
                    <tr>
                <?php 
                    $user = Auth::user();
                    if($user->role_id<>3){ ?>
                        <h3>{{ $user->name }}</h3>   
                <?php
                    } else { ?>
                        <td rowspan="2" colspan="3" style="text-align:center;">
                            <img src="{{ url($user->voter->person->image) }}" alt="Cover" width="250" height="450">
                            <h3>{{ $user->name }}</h3>  
                        </td>
                <?php  
                    }
                ?>
                    
                    
                        <td colspan="3">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <h4>Enter old password</h4>
                            <input type="password" name="oldp" id="oldp">
                            <h4>Enter new password</h4>
                            <input type="password" name="newp1" id="newp1">
                            <h4>Confirm new password</h4>
                            <input type="password" name="newp2" id="newp2">
                        </td>
                    
                    </tr>
                    <tr>
                        <td>
                        <button class="btn btn-primary">Confirm</button>
                        <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
                        </td>
                    </tr>
                    </form>
                    </tbody>
                </table>

            </div>
        @endauth
    @endif
@endsection
