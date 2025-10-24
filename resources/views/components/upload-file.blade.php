<div>
    
<div class="wrapper-upload" >


    

    <div class="preview" >

    @isset($media)
        @php
            $count = 0;
        @endphp


        @if($type == 'gallery')
            <ul class="list-gallery ordenar">
        @endif
      

                @if(@$media && @$media->midiaDinamica($collum))

                        @if($type == 'single')
                        
                        <input type="hidden" name="{{$collum}}" value="{{ @$media->midiaDinamica($collum)->id }}" />
                        <a href="#" class="remove" data-file="{{ @$media->midiaDinamica($collum)->id }}">
                            <i class="fas fa-times"></i>
                        </a>
                        <img src="{{ @$media->midiaDinamica($collum)->fullpatch() }}" alt=""><Br>

                        @else


                        @foreach ($media as $med)
                            <li>
                                <i class="fa fa-arrows-h" aria-hidden="true"></i> 
                                <input type="hidden" name="{{$collum}}[]" value="{{ @$med->midiaDinamica($collum)->id }}" />
                                <input type="hidden" class="ordemGaleria" name="ordem[]" value="{{ $count }}">
                                <img src="{{ @$med->midiaDinamica($collum)->fullpatch() }}" alt=""> 
                                <a href="#" class="remove" data-file="{{ @$med->midiaDinamica($collum)->id }}">
                                    <i class="fas fa-times"></i>
                                </a>
                            </li>

                            @php
                                $count++;
                            @endphp

                        @endforeach

                            
                        @endif
                

                @else
                <input type="hidden" name="{{$collum}}" value="" />
                @endif

            @if($type == 'gallery')
            </ul>
            @endif

        @endisset
            
    </div>

    <div class="">
        <a href="#" class="openPopUpMedia" data-type="{{ $type }}" data-target="{{ $target }}" data-collum="{{ $collum }}">
        Procurar Arquivo <i class="fas fa-edit"></i></a> 
    </div>





</div>



<!-- MODAL -->
    <div class="modal fade" id="modalMedia" data-backdrop="static"  data-bs-theme="dark" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="padding: 10px;" >
                <div id="contentMedia"></div>
                <div class="clearfix"></div>
            </div>
        </div>
        </div>

</div>


    @push('assets')
            <style>
             .wrapper-upload   {
                    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: 20px;
    margin: 15px;
                }
                .preview {
                    position: relative;
                    display: inline-block;
                    margin-bottom: 20px;
                    margin: 0 auto;
                }
                        .preview img {
                    height: 120px;
                    border: 1px solid;
                    /* padding: 2px; */
                    border-radius: 5px;
                    box-shadow: 0 0 8px #ededed;
                }
                .preview .remove {
                    position: absolute;
                    right: 0;
                    top: 0;
                    background: red;
                    border-radius: 0px 5px 0px 5px;
                    padding: 2px 6px;
                    color: #fff;
                }
                .preview .list-gallery {
        
        

        }
                .preview .list-gallery li{
                    list-style: none;
                
                    float: left;
                }
                .openPopUpMedia{
                    text-decoration: none;
                    display: block;
                    padding: 15px 20px;
                    width: 100%;
                    border: 2px solid #0d6efd;
                    text-align: center;
                    border-radius: 4px;
                }
                .openPopUpMedia:hover{
                    background: #0d6efd;
                    color: #000;
                    border: 2px solid #000;
                }
            </style>
    @endpush




@push('scripts')
<script>
      $("body").on('click',".openPopUpMedia",function(e){
      e.preventDefault();
        $(this).closest('.wrapper-upload').addClass('target-active');
      var target = $(this).data('target');
      var collum = $(this).data('collum');
      var type = $(this).data('type');
     
      openPopUpMedia(target,collum,type)
    })
      $("body").on('click',".remove",function(e){
      e.preventDefault();
       // $(this).closest('.preview').find('img').remove();
        var $input = $(this).closest('.preview').find('input[type="hidden"]');
        $(this).closest('.preview').html($input.val(''))
    })

    function openPopUpMedia(target,collum,type){
     
        if(target){
            localStorage.setItem("media_target", target);
        }
        if(collum){
            localStorage.setItem("media_collum", collum);
        }
        if(type){
            localStorage.setItem("media_type", type);
        }
        if($("#contentMedia").html() == ""){
        $.get('{{route("admin.media.popUp")}}',function(data){
            $("#contentMedia").html(data);
            $('#modalMedia').modal('show');
            $("#contentMedia").find('.checkFile').prop('checked',false);

        })
        }else{
        $('#modalMedia').modal('show')
        //$("#modalMedia .content").removeClass('hidden')
        $("#contentMedia").find('.checkFile').prop('checked',false);

        }
        }
</script>

@endpush