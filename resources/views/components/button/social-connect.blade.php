@props([
    'signIn' => null,
    'service',
    'colour',
    'bgColour'
])

<button {{$attributes}}
    @switch($service)
    @case('google')
    {{$colour = '#ea4335'}}
    {{$bgColour = '#C20806'}}
    @break

    @case('twitter')
    {{$colour = '#1da1f2'}}
    {{$bgColour = '#00B6F1'}}
    @break

    @case('pinterest')
    {{$colour = '#bd081c'}}
    {{$bgColour = '#C91517'}}
    @break

    @case('instagram')
    {{$colour = '#c32aa3'}}
    {{$bgColour = '#2C6A93'}}
    @break

    @case('linkedin')
    {{$colour = '#0a66c2'}}
    {{$bgColour = '#04669A'}}
    @break

    @case('facebook')
    {{$colour = '#1877f2'}}
    {{$bgColour = '#3B5998'}}
    @break

    @default
    {{$colour = '#1e429f'}}
    {{$bgColour = '#1a56db'}}
    @endswitch
    style="background-color: {{$colour}}"
    onmouseover="this.style.background='{{$bgColour}}'"
    onmouseout="this.style.background='{{$colour}}'"
    class="w-full px-4 py-2 text-sm font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded ">
    <span>
        {{$icon}}
    </span>
    <span> {{$signIn ? 'Sign in with ' : 'Connect with '}} {{ucfirst($service)}} </span>
</button>
