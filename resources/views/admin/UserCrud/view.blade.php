@foreach ($activities as $activity)
    <p>{{ $activity->activity }} at {{ $activity->created_at }}</p>
@endforeach
