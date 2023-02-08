@extends('admin.layout')
@section('title', 'Produit')

@section('content')


<style>
  input[type="file"] {
  display: block;
}
.imageThumb {
  /* position:absolute; */
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
  color: rgb(255, 255, 255)
}
.remove {
  top: -85px;
  width: 30px;
  position: relative;
  display: block;
  background:#ffff;
  border-radius: 20px;
  border: 1px solid rgb(255, 255, 255);
  color: rgb(59, 59, 61);
  text-align: center;
  cursor: pointer;
  box-shadow: 3px 4px rgb(188, 188, 188) ;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<div class="card mb-3">

    <div class="card-body">

      <div class="pt-1 pb-5 justify-content-around">
        <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="bi bi-arrow-90deg-left"></i> Retour</a>

        <h5 class="card-title text-center pb-0 fs-4">Modifier un produit</h5>
      </div>

      <form action="{{ route('produit.update',$produit['id']) }}" method="POST" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
      
        @csrf
            <div class="row">
              
  {{-- obligatoire element --}}
                <div class="col-6">
                   <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Champs obligatoire</h4>
                        <p class="card-text">
                            <div class="col-12 mb-3">
                                <label for="yourName" class="form-label">Titre du produit</label>
                                <input type="text" name="title" value="{{$produit['title']  }}" class="form-control" id="yourName" required>
                                <div class="invalid-feedback">Champs obligatoire</div>
                              </div>
                      
                              <div class="col-12 mb-3">
                                <label for="yourEmail" class="form-label">Prix du produit</label>
                                <input type="number" name="prix" value="{{ $produit['prix'] }}" class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Champs obligatoire</div>
                              </div>
                              <div class="col-12 mb-3">
                                <label class="form-label">Categorie</label>
                                  <select name="category"  class="form-select @error('category') is-invalid @enderror" aria-label="Default select example" required>
                                    <option disabled selected value>selectionner</option>
                                    @foreach ($category as $item)
                                    <option  class="text-uppercase" style="font-weight:bold; margin-bottom:10px; color:rgb(53, 53, 235)"  value="{{ $item['id']}}"  {{ $item['id'] == $produit['category_id'] ? 'selected' : '' }}>{{ $item['title'] }}</option>
                                    @endforeach
                                    
                                  </select>
                                  <div class="invalid-feedback">Champs obligatoire</div>
                                  @error('category')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                              </div>

                              <div class="col-12 mb-3">
                                <label class="form-label">Sous categorie</label>
                                  <select name="sous_category"  class="form-select @error('sous_category') is-invalid @enderror" aria-label="Default select example" required>
                                    <option disabled selected value>selectionner</option>
                                     @foreach ($category as $item)
                                     <option  class="text-uppercase" style="font-weight:bold; margin-bottom:10px; color:rgb(53, 53, 235)"  disabled value >{{$item['title']}}</option>
                                     @foreach ($item['sous_categories'] as $item)
                                    <option value="{{ $item['id']}}"  {{ $item['id'] == $produit['sous_category_id'] ? 'selected' : '' }} >{{$item['title']}}</option>
                                    @endforeach
                                    @endforeach

                                  </select>
                                  <div class="invalid-feedback">Champs obligatoire</div>
                                  @error('sous_category')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                              </div>
                      
                              <div class="col-12 mb-3">
                                <label for="yourPassword" class="form-label">Section</label>
                                <select name="section[]" multiple class="form-select placeholder js-states form-control  @error('category') is-invalid @enderror" aria-label="Default select example" required>
                                    {{-- <option disabled selected value>selectionner</option> --}}
                                    
                                    @foreach ($section as $key=>$item)
                                    <option value="{{ $item['id'] }}"
                                   @if ($produit->sections->containsStrict('id',$item->id)) selected="selected" @endif>
                                   {{ $item['title'] }}</option>
                                    @endforeach
                                    
                                  </select>

                                
                                  <div class="invalid-feedback">Champs obligatoire</div>
                                </div>
                        </p>
                    </div>
                   </div>
                </div>

                              
                  {{-- promo element --}}
                <div class="col-3">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Promo</h4>
                        <p class="card-text">
                            <div class="col-12 mb-3">
                                <label for="yourName" class="form-label">Prix de la promo</label>
                                <input type="number" value="{{ $produit['prix_promo'] }}" name="prix_promo" class="form-control" id="yourName">
                                {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                            </div>
                    
                            <div class="col-12 mb-3">
                                <label for="yourEmail" class="form-label">Date debut promo</label>
                                <input type="date" value="{{ $produit['date_debut_promo'] }}" name="date_debut_promo" class="form-control" id="yourEmail">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="yourEmail" class="form-label">Date fin promo</label>
                                <input type="date" value="{{ $produit['date_fin_promo'] }}" name="date_fin_promo" class="form-control" id="yourEmail">
                            </div>
                        </p>
                    </div>
                    </div>
                </div>

                  {{-- option element --}}
                  <div class="col-3">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Option</h4>
                        <p class="card-text">
                            <div class="col-12 mb-3">
                                <label for="yourName" class="form-label">Stock</label>
                                <input type="number" value="{{ $produit['stock'] }}" name="stock" class="form-control" id="yourName">
                            </div>
                    
                            <div class="col-12 mb-3">
                                <label for="yourEmail" class="form-label">Disponibilité</label>
                                <select name="disponibite" class="form-select ">
                                    <option disabled selected value>selectionner</option>
                                   <option value="disponible">disponible</option>
                                   <option value="rupture">rupture</option>
                                  </select>
                            </div>
                    
                            <div class="col-12 mb-3">
                                <label for="yourUsername" class="form-label">Couleur du produit</label>
                                <input type="color" value="{{ $produit['couleur'] }}" name="couleur" class="form-control form-control-color" id="exampleColorInput" value="#4154f1" title="Choisir une couleur">
                            </div>
                    
                        </p>
                    </div>
                    </div>
                </div>
                

  {{-- image element --}}
  <div class="col-6">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Ajouter des images</h4>
        <p class="card-text">
          
    
           
          <input class="form-control" type="file" id="files" name="files[]" multiple />

           

        </p>
    </div>
    </div>

</div>



 {{-- description element --}}
 <div class="col-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Description</h5>

        <!-- TinyMCE Editor -->
        <textarea name="description"   class="tinymce-editor">
            {{ $produit['description'] }}
        </textarea><!-- End TinyMCE Editor -->

      </div>
    </div>

  </div>


            </div>




        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Valider</button>
        </div>
       
      </form>

    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
        // var secondUpload = new FileUploadWithPreview('mySecondImage')
      
        //  console.log(getImage);
        //select
        $(".placeholder").select2({
    placeholder: "Selectionner",
    allowClear: true
});

      });


      //categorie * sous-category

      $('select[name="category"]').on('change', function (){
              var catId = $(this).val();
              // alert(catId);
              if (catId) {
                  $.ajax({
                      url: '/admin/produit/loadSubCat/' + catId,
                      type: "GET",
                      dataType: "json",
                      success: function (data) {
                          $('select[name="sous_category"]').empty();
                          $.each(data, function (key, value) {
                              $('select[name="sous_category"]').append('<option value=" ' + value.id + '">' + value.title + '</option>');
                                // console.log(key, value.title);
                            })
                      }

                  })
              } else {
                  $('select[name="sous_category"]').empty();
              }
        });


// recuperation des files en base de donnee

  var getImage = {{ Js::from($image) }}
console.log(getImage)

for (let index = 0; index < getImage.length; index++) {
          console.log(getImage[index].id);
  $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + getImage[index].original_url + "\" title=\"" + getImage[index].id + "\"/>" +
              "<br/><span class=\"remove\" data-id=\"" + getImage[index].id + "\" >x</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function(e){
              $(this).parent(".pip").remove();
              var getId =   e.target.dataset.id;
              // console.log(getId);


              //ajax delete image
             if (getId) {
              $.ajax({
                      url: '/admin/produit/deleteImage/' + getId,
                      type: "GET",
                      dataType: "json",
                      success: function (response) {
                        console.log(response);
                      }

                  })
             }
            });
}

 
//upload new file

if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var files = e.target.files;
          filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
          var f = files[i]
          var fileReader = new FileReader();
          fileReader.onload = (function(e) {
            var file = e.target;
            $("<span class=\"pip\">" +
              "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
              "<br/><span class=\"remove\">x</span>" +
              "</span>").insertAfter("#files");
            $(".remove").click(function(){
              $(this).parent(".pip").remove();
            });
          });
          fileReader.readAsDataURL(f);
        }
        console.log(files);
      });
    } else {
        alert("Your browser doesn't support to File API")
    }
     
     
     
     
    
    
    </script>
@endsection
