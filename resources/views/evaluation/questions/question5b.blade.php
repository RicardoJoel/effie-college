<div class="fila dato">
    <div class="columna columna-4">
        <p><i class="fa fa-briefcase"></i>&nbsp;{{ $qst5b->title.':' }}</p>
        <label>{{ '('.$qst5b->code.')' }}</label>
    </div>
    <div class="columna columna-2">
        <input type="text" id="ans5b" value="{{ old('ans5b', $ans5b->detail ?? '') }}" disabled>
    </div>
    @if(in_array(Auth::user()->situation,['ADMINISTRADOR','TUTOR']))
    <div class="columna columna-4">
        <a href="{{ Auth::user()->is_admin ? url('admin/avance',$user->id) : url('tutor/avance',$user->id) }}" class="btn-effie-inv" style="width:200px;float:right;margin:0">{{ __('Revisar avance') }}</a>
    </div>
    @endif
</div>
<div class="fila dato">
    <div class="columna columna-1">
        <p><i class="fa fa-info-circle"></i>&nbsp;{{ $qst5b->detail }}</p>
    </div>
</div>