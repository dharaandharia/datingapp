@extends('layouts.admin')

@section('styles')
    
@endsection

@section('content')
    <table id="usersTable" class="display">
        <thead> 
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Matches</th>
            <th>Country</th>
            <th>City</th>
            <th>Region</th>
            <th>Sex</th>
            <th>Looking for</th>
            <th>Subscibtion</th>
            <th>Swipes</th>

        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->status->information || $user->status->profile_picture || $user->status->tendencies)
                    <tr>
                        <td class="text-center">{{ $user->information->first_name }} {{ $user->information->last_name }}</td>
                        <td class="text-center"><a href="{{ url('/userdashboard/'.$user->id) }}">{{ $user->email }}</a></td>
                        <td class="text-center">{{ $user->information->b_day->age}}</td>
                        <td class="text-center">{{ $user->matches_num }}</td>
                        <td class="text-center">{{ $user->information->country }}</td>
                        <td class="text-center">{{ $user->information->city }}</td>
                        {{-- REGION --}}
                        @if ($user->information->region)
                            
                        <td class="text-center">{{ $user->information->region }}</td>
                        @else
                        <td class="text-center">-</td>
                        @endif
                        {{-- SEX --}}
                        @if ($user->information->iam == 0)
                        <td class="text-center">Female</td>
                        @endif
                        @if ($user->information->iam == 1)
                        <td class="text-center">Male</td>
                        @endif
                        @if ($user->information->iam == 2)
                        <td class="text-center">Non-Binary</td>
                        @endif
                        {{-- LOOKING FOR --}}
                        @if ($user->information->looking_for == 0)
                        <td class="text-center">Female</td>
                        @endif
                        @if ($user->information->looking_for == 1)
                        <td class="text-center">Male</td>
                        @endif
                        @if ($user->information->looking_for == 2)
                        <td class="text-center">Both</td>
                        @endif

                        {{-- SUBSCRIBTION --}}
                        @if ($user->information->subscribtion == 0)
                            <td class="text-center">Standard</td>
                        @endif
                        @if ($user->information->subscribtion == 1)
                            <td class="text-center">Premium</td>
                        @endif
                        @if ($user->information->subscribtion == 2)
                            <td class="text-center">Gold</td>
                        @endif
                        {{-- SWIPES --}}
                        @if ($user->information->subscribtion == 0)
                            <td class="text-center">{{ $user->information->swipes }}</td>
                        @endif
                        @if ($user->information->subscribtion == 1)
                            <td class="text-center"> &infin; </td>
                        @endif
                        @if ($user->information->subscribtion == 2)
                            <td class="text-center">&infin;</td>
                        @endif
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#usersTable').DataTable();
        } );
    </script>
@endsection
