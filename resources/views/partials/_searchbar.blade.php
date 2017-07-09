<div class="row">
    <div class="col-xs-12">
        {{Html::image('img/Santa_Ifigenia.png', 'SILOGO', ['class' => 'jumbo-logo img-responsive'])}}
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
        <form role="search" action="{{route('buscar')}}">
            <div id="form-group-id" class="form-group">
                <div class="input-group">
                    <input 
                        name="termo" 
                        value="{{isset($searchTerm)?$searchTerm:''}}" 
                        type="search" 
                        class="form-control" 
                        placeholder="Buscar..."
                        required>
                    <div class="input-group-btn">
                        <button id="search-button" class="btn btn-default btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>