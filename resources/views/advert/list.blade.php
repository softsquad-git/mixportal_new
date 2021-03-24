@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-3 ">
                <h4>Lista Ogłoszeń</h4>
                <hr>
                <ui5-list id="listNews" style="height: 650px" infinite-scroll mode="SingleSelect">
                    @foreach($list as $new)

                        <ui5-li type="details" onclick="details({{$new}})"  icon="nutrition-activity" image="{{$new->mainphoto['url'] ? 'images/adverts/'.$new->mainphoto['url'] : 'image/default-image.png'}}" description="{{$new->created_at}} Kategoria: {{$new->category['text']}}" info="Status: <?php if($new->payment['status'] == 'SUCCESS')echo 'Aktywne'; else echo '(czeka na aktywację)' ?>" info-state="info">
                            {{$new->title}}

                        </ui5-li>
                    @endforeach
                </ui5-list>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modal-image" width="300" src="" class="rounded mx-auto d-block mb-3" alt="">
                    <div class="h5" id="category"></div>
                    <div id="status"></div>
                    <div id="created-date"></div>
                    <div id="valid-date"></div>
                    <div id="modal-buttons-user" class="buttons"></div>
                    @if(request()->user()->admin == 1)
                    <div id="modal-buttons" class="buttons"></div>
                        <div id="user-info">
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">


        function send(id){
            var url = '{{ route("advert", ':id') }}';
            url = url.replace(':id', 'id='+id);
            window.location.href=url;
        }
        function pay(type,id){
            var url = '{{ route("payment", ':type') }}';
            url = url.replace(':type', 'type='+type+'&id='+id);
            window.location.href=url;
        }

        function deleteAdvert(id){
            axios({
                method: 'post',
                url: '/api/deleteAdvert',
                data: {id: id},
                config: {
                    headers: {
                        'Authorization': 'Bearer ' + $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json',
                    }
                }
            }).then((result) => {
                location.reload();
            });
        }

        function actionActive(id,val) {
            if(val){
                axios({
                    method: 'post',
                    url:'/api/activeAdvert',
                    data:{id:id},
                    config: {
                        headers: {
                            'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                            'Accept' : 'application/json',
                        }}}).then((result)=>{
                            location.reload();

                });
            }else{
                axios({
                    method: 'post',
                    url:'/api/disactiveAdvert',
                    data:{id:id},
                    config: {
                        headers: {
                            'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                            'Accept' : 'application/json',
                        }}}).then((result)=>{
                    location.reload();
                });
            }
        }

        function routeto(data){
            var url = '{{ route("talent", ':slug') }}';
            url = url.replace(':slug',data);
            window.location.href=url;
        }


        function details(data){
            // remove old childreen
            $('#modal-buttons-user').empty();
            $('#modal-buttons').empty();

            if(data['mainphoto'])$('#modal-image').attr("src","/images/adverts/"+data['mainphoto']['url']); else $('#modal-image').attr("src","/image/default-image.png");
            $('#modal-title').text(data['title']);
            $('#category').text('Kategoria: '+ data['category']['text'])
            if(data['created_at'])$('#created-date').text('Data utworzenia:  '+ new Date(data['created_at']).getDate() +'.'+(new Date(data['created_at']).getMonth()+1)+'.'+new Date(data['created_at']).getFullYear());
            $('#valid-date').text((() => { if(data['payment']['status'] == 'SUCCESS'){return 'Ważność do: ' + new Date(data['payment']['created_at']).getDate() +'.'+ (parseInt(new Date(data['payment']['created_at']).getMonth())+ 1) +'.'+ (parseInt(new Date(data['payment']['created_at']).getFullYear())+ 1)}else return ''}));
            $('#status').text('Płatność: '+ (() => { if(data['payment']['status'] == 'SUCCESS'){ return 'Opłacono'; }else{ return 'Do opłacenia';} })());
            $('#modal-buttons-user').append('<ui5-button onclick="send('+data['id']+')" design="info" icon="edit">Edytuj</ui5-button>' +
                '<ui5-button onClick="routeto(\''+data['slug']+'\')" class="ml-2" design="Default">Podgląd</ui5-button>'+
                '<ui5-button onclick="deleteAdvert('+data['id']+')" class="ml-2" design="danger" >Usuń ogłoszenie</ui5-button>');

            if(data['payment']['status'] !== 'SUCCESS')$('#modal-buttons-user').append('<ui5-button class="ml-2" onclick="pay('+data['type']+','+data['id']+')" design="info" >Zapłać</ui5-button>');
            if(data['disactive'])$('#modal-buttons').append('<ui5-button onClick="actionActive('+data['id']+',0)"  design="Negative" icon="accept">Włącz</ui5-button>');
            else $('#modal-buttons').append('<ui5-button design="Positive" onClick="actionActive('+data['id']+',1)" icon="accept">Wyłącz</ui5-button>');

            if(data['user']) {

                $('#user-info').html('<div class="card"><div class="card-body"><h5>Użytkownik</h5>Email: ' + data['user']['email'] + '<br>' +
                    'Imię i nazwisko: ' + data['user']['firstname'] + ' ' + data['user']['surname'] + '<br>' +
                    'Firma: ' + data['user']['company']+'</div></div>');
            }

            $('#myModal').modal('show')
        }
    </script>
@endsection


