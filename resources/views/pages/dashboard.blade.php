@extends('layouts.dashboard')
@section('title', 'Dashboard - PolCaBot')

@section('dashboard-content')
<div class="main-content" id="mainContent">
  <div class="welcome-section">
    <h1>Selamat Datang di <span class="text-sky-600 font-bold">PolCaBot</span></h1>
    <p>Hai {{ $user->name ?? 'User' }}, PolCaBot siap membantu menjawab segala pertanyaan akademik dari Kampus Polibatam</p>

    <div class="quick-actions grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6">
      @foreach($quickActions as $action)
        <div class="action-card cursor-pointer hover:shadow-lg transition border rounded-lg p-4"
             onclick="startChat('{{ $action['title'] }}')">
          <h3 class="text-sky-600 font-semibold">{{ $action['title'] }}</h3>
          <p class="text-gray-600 text-sm">{{ $action['description'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection

@section('extra-content')
@include('components.chatbot')
<script>
async function startChat(question) {
  const res = await fetch('{{ route("chat.create") }}', {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
  });
  const data = await res.json();
  window.location.href = `/chat/${data.chat_id}?message=${encodeURIComponent(question)}`;
}

</script>
@endsection
