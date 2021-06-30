
@extends('theme.admin')
@section('main-content')
<main class="site-content">
    <div class="container">
            <div class="row">
                <div class=" col-md-12">
                    <h1>les notifications</h1>
                    <table class="table table-hover ">
                        <!-- <thead>
                        <tr>
                            <th scope="col">#courrier</th>
                        </tr>
                        </thead> -->
                        <tbody>
                        @foreach (Auth::user()->notifications as $notification)
                        <span style="">
                            {{$notification->id}}
                            {{count(Auth()->user()->unreadNotifications) }}

                        {{ $courrier = App\Models\Courrier::where('id',$notification->data['courrier_id'])->first() 
                        ->where('deleted_at', NULL)->first()}}
                        
                        </span>
                        {{-- @if(!empty($courrier))
                            <tr>
                                <td scope="row">
                                    @include('app.notifications.item_notification')
                                </td>
                            </tr>
                        @endif --}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
@endsection