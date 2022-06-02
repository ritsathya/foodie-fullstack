@props(['post'])

<div class="flex py-2 mb-4 justify-between space-x-4">
  <div class="flex items-center space-x-2">
    <img class="w-10 h-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/147/147142.png" alt="">
    <h3>{{$post->user->name}}</h3>  
    <div class="text-sm text-slate-400">posted {{ $post->created_at->diffForHumans() }}</div>
  </div> 
  @auth
    <x-posts.ellipsis-menu id="dropDown" toggle_id="dropdown" :post="$post"/>
  @endauth
</div>