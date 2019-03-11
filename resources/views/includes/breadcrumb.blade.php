<!-- Breadcrumb done by @sina-rzp -->


<nav aria-label="breadcrumb">
    <ol class="breadcrumb"> 
<li class="breadcrumb-item">
    <i class="fa fa-home"></i>
<a href="{{ URL::to('/') }}">Home</a>
</li>
@php 
  $bread = URL::to('/'); 
  $link = Request::path(); 
  $subs = explode("/", $link);
@endphp
  
@if (Request::path() != '/') 
  @for($i = 0; $i < count($subs); $i++)

    @php 
      $bread = $bread."/".$subs[$i]; 
      $title = urldecode($subs[$i]);
      $title = str_replace("-", " ", $title);
      $title = title_case($title);
    @endphp

<li class="breadcrumb-item active" aria-current="page"> <a href="{{ $bread }}"><span>{{ $title }}</span></a></i>
 
  @endfor

@endif

</ol>

</nav>