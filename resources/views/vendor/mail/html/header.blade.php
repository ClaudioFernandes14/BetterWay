<tr>
<td class="header">
@if (trim($slot) === 'Laravel')
<img  src="{{asset('/resources/images/logo.png')}}" class='logo'>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
