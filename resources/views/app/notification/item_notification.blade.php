

<a href="{{ getNotificationUrl($notification,$notification->data['courrier_id'] ) }}"
    style="color:black">
      <p> {!! getNotificationMessage($notification) !!}</p>
    </a>
    
    
    @if($notification->read_at == null)
    <span class="badge badge-danger ml-auto">unread</span>
    
    @endif
 <p>{{ $notification->data['courrier_id'] }}</p>