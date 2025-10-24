

<form action="{{route('admin.redes_sociais.update',['user_id' => $redes_sociais->user_id] )}}" id="atualizar-redes" enctype="multipart/form-data">
            @csrf
            <div class="row ms-2">

                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>facebook/</strong></span>
                        <input type="text" name="facebook" id="facebook" value="{{ $redes_sociais->facebook ?? '' }}" class="custom-input pr-5">
                        <i class="fab fa-facebook position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>
                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>twitter/</strong></span>
                        <input type="text" name="twitter" id="twitter" value="{{ $redes_sociais->twitter ?? '' }}" class="custom-input pr-5">
                        <i class="fab fa-twitter position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>
                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>linkedin/</strong></span>
                        <input type="text" name="linkedin" id="linkedin" value="{{ $redes_sociais->linkedin ?? '' }}" class="custom-input pr-5">
                        <i class="fab fa-linkedin position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>
                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>youtube/</strong></span>
                        <input type="text" name="youtube" id="youtube" value="{{ $redes_sociais->youtube ?? '' }}" class="custom-input pr-5">
                        <i class="fab fa-youtube position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>
                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>instagram/</strong></span>
                        <input type="text" name="instagram" id="instagram" value="{{ $redes_sociais->instagram ?? '' }}" class="custom-input pr-5">
                        <i class="fab fa-instagram position-absolute"  style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>
                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>pinterest/</strong></span>
                        <input type="text" name="pinterest" id="pinterest" value="{{ $redes_sociais->pinterest ?? '' }}" class="custom-input pr-5">
                        <i class="fab fa-pinterest position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>
                <div class="col-sm-12 mb-4 position-relative">
                    <div class="input-group">
                        <span class="input-group-text "><strong>website/</strong></span>
                        <input type="text" name="website" id="website" value="{{ $redes_sociais->website ?? '' }}" class="custom-input pr-5">
                        <i class="fas fa-globe-asia position-absolute" style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                        </div>
                </div>






                
             

                



              

            </div>
            <hr>

            <div class="col-12  px-3">
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>

    </form>
   