<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <img class="me-2" src="/assets/img/icons/spot-illustrations/keynotion-favicon.png" alt="" width="40">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
