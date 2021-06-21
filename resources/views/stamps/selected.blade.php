<div>
    <h2>stamp:</h2>
    <div class="stamps-area">
    @foreach ($listastamps as $stamps=> $stamp)
    
        <div class="stamp">
    
         <div class="stamp-imagem">
             <img src="{{Storage::url('/stamps/'.$stamp->imagem_url)}}" alt="stamp">
         </div>
            <div class="stamp-info-area">
                <div class="stamp-info">
                    <span class="stamp-label">Nome</span>
                    <span class="stamp-info-desc">{{ $stamp->nome }}</span>
                </div>
            </div>
        </div>
    
    
    
    @endforeach
    </div>
</div>