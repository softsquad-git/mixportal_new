/* CUSTOM JS */
/* AUTHOR: GACODE ADRIAN WOLF*/
/*DATE: 17-08-2020 */
//////////////////////////////////
var countOfImage = 0;
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    'X-Requested-With': 'XMLHttpRequest'
};

$(document).ready(function() {
    init();
});
   

function init(){
    searchCity();
    imageUploadandRemove();
    imageToNewsUploadandRemove();
    categoryCompanyEvent();


    let city = document.getElementById('city').value

    if(city) {
        var text = $('#city').val();

        $('#cities').empty();
        axios.get('https://nominatim.openstreetmap.org/search?q=' + text + '&format=geojson&addressdetails=1').then((data) => {
            let arrayCity = data.data.features;
            arrayCity = arrayCity.reduce((unique, o) => {
                if (!unique.some(obj => obj.properties.display_name === o.properties.display_name)) {
                    unique.push(o);
                }
                return unique;
            }, []);

            arrayCity.forEach((rec, i) => {
                var option = document.createElement('option');
                // Set the value using the item in the JSON array.
                option.value = rec.properties.display_name;
                option.id = JSON.stringify(rec);

                $('#cities').append(option);
                //  $('#cities').append("<option id='"+JSON.stringify(rec)+"' value='" +rec.properties.display_name+"' label='"+  rec.properties.address.postcode + "'>"+rec.properties.display_name+"</option>");
            })
        })
    }



        function datalistValidator(modelname) {
        var obj = $("#cities").find("option[value='" + modelname + "']");
        if (obj != null && obj.length > 0) {
            //alert("valid"); // allow form submission
            return true
        }
        //alert("invalid"); // don't allow form submission
        return false;
    }

        $('#ItemEditForm').submit(function() {
            var modelname = $("#city").val();
            var existingModelName = $('h2').text();
            //alert("Submitted: " + modelname);
            if (datalistValidator(modelname)) {
                return true;
            }

            $("#errorCity").text("Proszę wpisać miejscowość, a następnie wybrać ją z listy.");
            $("#alertErrorCity").show();
            $("#city").val(existingModelName).focus().select().animate({
                right: '25px'
            }).animate({
                left: '25px'
            });
            return false;
        });




 if($('#categoryCompany').val()) {
     var id_sub = $('#id_subcategory').val();
     window.axios({
         method: 'post',
         url: '/api/childCategories',
         data: {'id': $('#categoryCompany').val()},
         config: {
             headers: {
                 'Authorization': 'Bearer ' + $('meta[name="csrf-token"]').attr('content'),
                 'Accept': 'application/json',
             }
         }
     }).then((result) => {
         console.log(result)
         $('#subcategory').empty();
         $('#subcategory').removeClass('d-none').addClass('d-block');
         for (var index in result.data) {
             let selectedText ="" ;
             if(result.data[index].id == id_sub)selectedText = "selected"
             $('#subcategory').append('<option id="' + result.data[index].id + '" value="' + result.data[index].id + '"'+selectedText+'>' + result.data[index].text + '</option>')
         }
     });
 }
}

/* SERVER AUTOCOMPLETE SEARCH https://nominatim.openstreetmap.org/search?q= */
/* wto - cleared object Timeout before send request to API */
/* timeout - time to send request to API */


function categoryCompanyEvent(){

    $('#categoryCompany').on('change', function() {

        axios({
            method: 'post',
            url:'/api/childCategories',
            data:{'id':this.value},
            config: {
                headers: {
                    'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                }}}).then((result)=> {
                    $('#subcategory').empty();
                    $('#subcategory').removeClass('d-none').addClass('d-block');
                    for(var index in result.data){
                        $('#subcategory').append('<option id="'+result.data[index].id+'" value="'+result.data[index].id+'">'+result.data[index].text+'</option>')
          }
        });
    });

}
function searchCity() {
    var wto = null;
    let timeout = 200;
    function callback() {
        clearTimeout(wto);
        wto = setTimeout(function() {
            var text = $('#city').val();
            $('#cities').empty();
            axios.get('https://nominatim.openstreetmap.org/search?q='+text+'&format=geojson&addressdetails=1').then((data)=>{
                let arrayCity = data.data.features;
                arrayCity = arrayCity.reduce((unique, o) => {
                    if(!unique.some(obj => obj.properties.display_name === o.properties.display_name)) {
                        unique.push(o);
                    }
                    return unique;
                },[]);

                arrayCity.forEach((rec,i)=>{
                    var option = document.createElement('option');
                    // Set the value using the item in the JSON array.
                    option.value = rec.properties.display_name;
                    option.id = JSON.stringify(rec);

                    $('#cities').append(option);
                  //  $('#cities').append("<option id='"+JSON.stringify(rec)+"' value='" +rec.properties.display_name+"' label='"+  rec.properties.address.postcode + "'>"+rec.properties.display_name+"</option>");
                })

            })
        }, timeout);

    }


    function findWord(word, str) {
        return str.split(' ').some(function(w){return w === word})
    }

    // input OPEN STREET OBJECT TO HIDDEN INPUT OR WOJEWODZSTWO PUT
    function hiddenInputChange(th){
        var options = $('datalist')[0].options;

        for (var i=0;i<options.length;i++){
            if (options[i].value == $(th).val())
            {
                let z = $('#cities');
                let val = $(z).find('option[value="' + $(th).val() + '"]');
                let endval = val.attr('id');

                if(endval)$('#hiddenCity').val(endval);

                let states = JSON.parse(endval).properties.address.state
                if($('.state_option'))$('.state_option').each(function(index,item){

                    if(findWord($(item).val().toLowerCase(), states)) {
                        $(item).attr("selected", "selected");

                    }
                });
                break;
            }
        }
    }

    $( "#city" ).change(function() {
        hiddenInputChange(this);
    });

    $('#city').on('input', function () {
    hiddenInputChange(this);
    });


    $( "#city" ).blur(function() {
        hiddenInputChange(this);
    });

    $('#city').on('input',callback);
    $('#city').on('keyup',callback);


}

/* imageUploadandRemove */
/* Event click to upload image to server*/
/* Event click remove to deleete image from server and frontend*/

function imageUploadandRemove() {
        var countImage = 0;
        $('#photoImage').on('change', function(e){

            e.preventDefault();
            if(countImage == 12){
                //$('.photoImageBtn').addClass('disabled');
                $('#photoImage').attr("disabled", true);


            }else{

            let img = e.target.files[0]
            let fd= new FormData()
            fd.append('image', img)

            axios({
                method: 'post',
                url:'/api/imageUpload',
                data:fd,
                config: {
                    headers: {
                        'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                        'Accept' : 'application/json',
                }}}).then((result)=>{
                    countImage++;

                $('#image-list').append('' +
                    '<div class="image-container ml-2" id="container_'+result.data.split('.').join("")+'"><img width="190px" class="img-thumbnail img-fluid" src="/images/adverts/'+result.data+'">' +
                    '<img id="'+result.data+'" onclick="removeImage(this)" class="remove-img" src="image/criss-cross.png">' +
                    '<input type="hidden" id="image_'+countOfImage+'" name="image_'+countOfImage+'" value='+result.data+'>'+
                    '</div>'
                )


                countOfImage++;
                });

            window.removeImage = function(e){
                axios({
                    method: 'post',
                    url:'/api/imageRemove',
                    data:{name:e.id},
                    config: {
                        headers: {
                            'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                            'Accept' : 'application/json',
                        }}}).then((result)=>{
                            countImage--;
                    if(countImage < 6){
                        $('.photoImageBtn').removeClass('disabled');
                        $('#photoImage').attr("disabled", false);
                    }
                            $('#container_'+e.id.split('.').join("")).remove();
            });
            }
            }
        });


}

function imageToNewsUploadandRemove() {
    $('#photoImageNews').on('change', function(e){
        e.preventDefault();

        let img = e.target.files[0]
        let fd= new FormData()
        fd.append('image', img)

        axios({
            method: 'post',
            url:'/api/imageToNewsUpload',
            data:fd,
            config: {
                headers: {
                    'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                    'Accept' : 'application/json',
                }}}).then((result)=>{

            $('#image-list-news').append('' +
                '<div class="image-container ml-2" id="container_'+result.data.split('.').join("")+'"><img width="190px" class="img-thumbnail img-fluid" src="/images/news/'+result.data+'">' +
                '<img id="'+result.data+'" onclick="removeImage(this)" class="remove-img" src="image/criss-cross.png">' +
                '<input type="hidden" id="image_'+countOfImage+'" name="image_'+countOfImage+'" value='+result.data+'>'+'</div>' )

            countOfImage++;
        });

        window.removeImage = function(e){
            axios({
                method: 'post',
                url:'/api/imageToNewsRemove',
                data:{name:e.id},
                config: {
                    headers: {
                        'Authorization':'Bearer '+$('meta[name="csrf-token"]').attr('content'),
                        'Accept' : 'application/json',
                    }}}).then((result)=>{
                $('#container_'+e.id.split('.').join("")).remove();
            });
        }
    });

}

