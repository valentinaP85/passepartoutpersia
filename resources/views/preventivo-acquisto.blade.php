@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Richiedi un preventivo</h1>
        </div>
    </div>
</div>
@if (session('message'))
<div class="alert text-center mt-2 bg-info" role="alert">
    <h4>{{ session('message') }}</h4>
</div>
@endif 
<form action="{{route('richiestaPreventivo')}}" method="post" enctype="multipart/form-data" id="formAcquisto">
    @csrf
    <div class="conteiner-fluid container-max p-0 mx-auto">
        <div class="row justify-content-center px-0 pt-1 m-0"> 
            <div class="col-12 col-md-3 mb-3">
                <label for="name" class="form-label">nome*</label>
                <input type="text" class="form-control rounded-0" max="30" name="name" value="{{old('name')}}" id="name" required>
                @error('name')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="surname" class="form-label">cognome*</label>
                <input type="text" class="form-control rounded-0" max="30" name="surname" value="{{old('surname')}}" id="surname" required>
                @error('surname')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="email" class="form-label">email*</label>
                <input type="email" class="form-control rounded-0"  name="email" value="{{old('email')}}" id="email" required>
                @error('email')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-2 mb-3">
                <label for="telefono" class="form-label">telefono</label>
                <input type="tel" class="form-control rounded-0" max="30" name="telefono" value="{{old('telefono')}}" id="telefono" autocomplete="tel">
            </div>
        </div>  
        <div class="row justify-content-center px-0 m-0"> 
            <div class="col-12 col-md-2 mb-3 autocomplete">
                <label for="provincia" class="form-label">provincia*</label>
                <input class="form-control rounded-0" type="text" name="provincia" value="{{old('provincia')}}" required id="provincia" >
                @error('provincia')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-2 mb-3">
                <label for="cap" class="form-label">cap*</label>
                <input class="form-control rounded-0"  type="number" name="cap" required id ="frmZipS" size="5" autocomplete="shipping postal-code">
                @error('cap')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div> 
            <div class="col-12 col-md-7 form-group pb-2 px-2">
                <label class="form-label" for="message">Messaggio</label>
                <textarea name="message" type="textarea" class="form-control rounded-0" id="message" cols="40" rows="2">{{old ('message')}}</textarea>
                @error('message')
                <div class="alert alert-danger info-error">{{$message}}</div>   
                @enderror
            </div>
        </div> 
    </div>
    <div class="conteiner-fluid container-max p-0 mx-0 mx-md-auto">
        <div class="row p-0 align-items-center h-100 justify-content-between px-2 px-md-5">
            <div class="col-6"> 
                <button class="btn" type="button"  id="addButton" onclick="duplicateCorn()"><i class="fas fa-plus-circle fa-2x txt-accent"> </i> Cornice</button> 
                <button class="btn" type="button"  id="addButton" onclick="duplicatePass()"><i class="fas fa-plus-circle fa-2x txt-green"> </i> Passepartout</button> 
            </div>
            <div class="col-6 text-end">
                <input name="numberPass" type="number" class="invisible" id="numberPass" value="0" readonly="readonly">
                <input name="numberCorn" type="number" class="invisible" id="numberCorn" value="0" readonly="readonly"> 
                <h6> 
                    <input name="numberBox" type="number" class="index-box m-0" id="numberBox" value="0" readonly="readonly">
                </h6>
            </div> 
        </div>
        <div class="row p-0 align-items-center h-100 justify-content-between px-2 px-md-5">
            <div id="newBox" class="m-auto">    </div> 
        </div>   
        <div class="row px-lg-5 justify-content-center w-100">
            <div class="col-12 col-md-6 text-center py-3 w-100">
                <button type="submit" class="btn border border-danger rounded-0 btn-width text-center shadow-gray shadow-h-none invisible " id="btn-richiesta" ><strong>Richiedi disponibilità</strong> </button>
            </div>
        </div>
    </div>
</form>

@push('script')
<script>
    let index = 0;   //totale di box inseriti
    let indexPass = 0;  //totale di box Passepartout inseriti
    let indexCorn = 0;   //totale di box Cornici inseriti
    let newBox = document.getElementById('newBox'); //div che contiene tutti i box
    let numberBox =document.getElementById('numberBox'); //campo input di sola lettura che contiene index
    let numberPass =document.getElementById('numberPass');//campo input di sola lettura che contiene indexPass
    let numberCorn =document.getElementById('numberCorn');//campo input di sola lettura che contiene indexCorn
    let btnRichiesta= document.getElementById('btn-richiesta'); //btn per l'ivio del form
    let ultimaCorn=document.querySelector('#removeBoxC'+ indexCorn);//btn dell'ultimo box Cornici
    let ultimoPass=document.querySelector('#removeBoxP'+ indexPass);//btn dell'ultimo box Passepartout
    let btnremoveC=document.getElementsByClassName('removeC');//classe di ultimaCorn
    let btnremoveP=document.getElementsByClassName('removeP');//classe di ultimoPass
    
    function invisibleBtnRemove (btnx, ultimo){
        for (let i = 0; i < btnx.length; i++) {
            if(btnx[i]=ultimo){
                btnx[i].classList.remove("visible")
                btnx[i].classList.add("invisible")
            }   
        }  
    }
    function visibleBtnRemove (btnx, ultimo){
        for (let i = 0; i < btnx.length; i++) {
            if(btnx[i]!=ultimo){
            }else if(btnx[i]=ultimo) {
                btnx[i].classList.remove("invisible")
                btnx[i].classList.add("visible")
            }
        }
    }
    function duplicateCorn() {
        if(index<=14){
            index++
            indexCorn++
            // assegna il bottone per rimuovere il box
            invisibleBtnRemove (btnremoveC, ultimaCorn);
            let newB = document.createElement('div');
            newB.setAttribute("id","newBoxCorn"+indexCorn);
            newBox.appendChild(newB);
            let FrameHtml =  ` 
            <div class="row align-items-center my-2 px-2">
                <div class="col-12" id="Frame` + indexCorn + `">
                    <div class="row shadow-gray bg-red mt-2 pt-1">
                        <div class="col-12 col-md-2 mb-3">
                            <label for="frame_id` + indexCorn + `" class="form-label">*Profilo Cornice</label>
                            <select class="form-select rounded-0" name="frame_id` + indexCorn + `" id="frame_id` + indexCorn + `" required >
                                <option disabled>scegli</option>	
                                @foreach( $frames as $frame)
                                <option value="{{$frame->id}}">{{$frame->profilo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2 mb-3 autocomplete">
                            <label for="frameSize` + indexCorn + `" class="form-label">*Misura Cornice</label>
                            <input type="text" class="form-control rounded-0"  id="frameSize` + indexCorn + `"name="frameSize` + indexCorn + `" id="frameSize` + indexCorn + `"required >	
                        </div>
                        <div class="col-12 col-md-1 mb-3">
                            <label for="nFrame` + indexCorn + `" class="form-label"> Q.ta'</label> 
                            <input  class="form-control rounded-0" type="number"  max="999" name="nFrame` + indexCorn + `" id="nFrame` + indexCorn + `"  maxlength="3" required>
                        </div>
                        <div class="col-12 col-md-1 mb-3">
                            <label for="vertF` + indexCorn + `" class="form-label"> Verticali</label> 
                            <input  class="form-control rounded-0"  type="number" name="vertF` + indexCorn + `" id="vertF` + indexCorn + `" maxlength="3"  required/>
                        </div>
                        <div class="col-12 col-md-1 mb-3">
                            <label for="orizzF` + indexCorn + `" class="form-label"> Orizzontali</label> 
                            <input  class="form-control rounded-0"  type="number" name="orizzF` + indexCorn + `" id="orizzF` + indexCorn + `" maxlength="3"  required />
                        </div>
                        <div class="col-12 col-md-2 mb-3">
                            <label for="color_id` + indexCorn + `" class="form-label">*Colore</label>
                            <select class="form-select rounded-0" name="color_id` + indexCorn + `" id="color_id` + indexCorn + `" required >
                                <option disabled>scegli</option>													
                                @foreach( $colors as $color)
                                <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2 mb-3">
                            <label for="glass_id` + indexCorn + `" class="form-label">*Copertura</label>
                            <select class="form-select rounded-0" name="glass_id` + indexCorn + `" id="glass_id` + indexCorn + `"  required>	
                                <option disabled>scegli</option>												
                                @foreach($glasses as $glass)
                                <option value="{{$glass->id}}">{{$glass->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-1 mb-3">
                            <button class="btn visible removeC" type="button"  id="removeBoxC` + indexCorn + `" onclick="corn();deleteBox()">
                                {{--button invisible--}}
                                <i class="fas fa-minus-circle fa-2x txt-accent"></i>
                            </button>  
                        </div>
                    </div>
                </div>
            </div>`
            newB.innerHTML= FrameHtml;
            numberBox.setAttribute("value", index);
            numberCorn.setAttribute("value", indexCorn);
            ultimaCorn=document.querySelector('#removeBoxC'+ indexCorn);
            if( index>0){
                btnRichiesta.classList.remove("invisible")
                btnRichiesta.classList.add("visible")
            }   
        }else{
            alert('non è possibile inserire altri box. Raggiunto il numero massimo.') 
            return 
        }
        autocomplete(document.getElementById("frameSize"+indexCorn), misure); 
    } 
    function duplicatePass() {
        if(index<=14){
            index++
            indexPass++
            // assegna il bottone per rimuovere il box
            invisibleBtnRemove (btnremoveP, ultimoPass);
            let newP = document.createElement('div');
            newP.setAttribute("id","newBoxPass"+indexPass);
            newBox.appendChild(newP);
            let CardboardHtml =  ` 
            <div class="row align-items-center my-2 px-2">
                <div class="col-12" id="Cardboard` + indexPass + `">
                    <div class="row shadow-gray bg-green mt-2 pt-1">
                        <div class="col-12 col-md-2 mb-3">
                            <label for="cardboard_id` + indexPass + `" class="form-label">*Cartone</label>
                            <select class="form-select rounded-0" name="cardboard_id` + indexPass + `" id="cardboard_id` + indexPass + `"  required>	
                                <option disabled>scegli</option>	
                                @foreach($cardboards as $cardboard)
                                <option value="{{$cardboard->id}}">{{$cardboard->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-1 mb-3">
                            <label for="nCardboard` + indexPass + `" class="form-label"> Q.ta'</label> 
                            <input  class="form-control rounded-0" type="number"  max="999" name="nCardboard` + indexPass + `" id="nCardboard` + indexPass + `"  maxlength="3" required >
                        </div>
                        <div class="col-12 col-md-2 mb-3">
                            <label for="cardboardColor` + indexPass + `" class="form-label">*Colore</label>
                            <select class="form-select rounded-0" name="cardboardColor` + indexPass + `" id="cardboardColor` + indexPass + `"  required>	
                                <option disabled>scegli un opzione</option>
                                <option>Bianco</option>
                                <option>Avorio </option>								
                                <option>Grigio </option>
                                <option>Nero</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-2 mb-3 autocomplete">
                            <label for="misuraE` + indexPass + `" class="form-label" > Misura Esterna</label> 
                            <input type="text" class="form-control rounded-0"   name="misuraE` + indexPass + `" id="misuraE` + indexPass + `"   placeholder= "40x50" required/>
                        </div>
                        <div class="col-12 col-md-2 mb-3">
                            <label for="misuraI` + indexPass + `" class="form-label">  Misura Interna</label>
                            <input  class="form-control rounded-0" type="text" name="misuraI` + indexPass + `"  id="misuraI` + indexPass + `" placeholder= "20x30" required/>
                        </div>
                        <div class="col-12 col-md-2 mb-3">
                            <label for="fondo` + indexPass + `" class="form-label"> Fondo</label>
                            <select class="form-select rounded-0" name="fondo` + indexPass + `" id="fondo` + indexPass + `" required >	
                                // qui ci sarà un foreach delle barriere
                                <option disabled>scegli</option>	
                                <option>senza fondo</option>													
                                <option>Tipo1</option>
                                <option>Tipo2</option>								
                            </select>	
                        </div>
                        <div class="col-12 col-md-1 mb-3">
                            <button class="btn visible removeP" type="button"  id="removeBoxP` + indexPass + `" onclick="pass();deleteBox()">
                                {{--button invisible--}}
                                <i class="fas fa-minus-circle fa-2x txt-accent"></i>
                            </button>  
                        </div>
                    </div>
                </div>
            </div>`
            newP.innerHTML= CardboardHtml;
            numberBox.setAttribute("value", index);
            numberPass.setAttribute("value", indexPass);
            ultimoPass=document.querySelector('#removeBoxP'+ indexPass); 
            if( index>0){
                btnRichiesta.classList.remove("invisible")
                btnRichiesta.classList.add("visible")
            }
        }else{
            alert('non è possibile inserire altri box. Raggiunto il numero massimo.') 
            return 
        }
        autocomplete(document.getElementById("misuraE"+indexPass), misure); 
    } 
    let x ='';
    let ind = 0;   
    function pass(){
        x ='Pass';
        ind = indexPass;    
    }
    function corn(){
        x ='Corn';
        ind = indexCorn;      
    }
    function deleteBox() {
        if(ind==indexCorn && x=='Corn'){
            indexCorn--;
            numberCorn.setAttribute("value", indexCorn);
            ultimaCorn=document.querySelector('#removeBoxC'+ indexCorn);
            visibleBtnRemove (btnremoveC, ultimaCorn);
        }else if(ind==indexPass && x=='Pass')
        {
            indexPass--;
            numberPass.setAttribute("value", indexPass);
            ultimoPass=document.querySelector('#removeBoxP'+ indexPass);
            visibleBtnRemove (btnremoveP, ultimoPass);  
        }else{
            console.log("c'è un errore");
        }  
        
        let element =document.querySelector('#newBox'+x+ind);
        element.remove();
        index--;
        numberBox.setAttribute("value", index);
        if( index<=0){
            btnRichiesta.classList.remove("visible")
            btnRichiesta.classList.add("invisible")
        }   
    } 
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        let currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            let a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            let x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus letiable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus letiable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (let i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            let x = document.getElementsByClassName("autocomplete-items");
            for (let i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }
    
    let misure=['18x24', '24x30', '30x40', '35x50', '40x50', '40x60', '50x60', '50x70', '60x60', '60x80', '70x70', '70x100', '80x120'];
    
    let form=document.querySelector('#formAcquisto')
    form.addEventListener('submit',(e)=>  {
        e.preventDefault()
        let okC= 0;
       
        for (let i = 1; i <=indexCorn; i++) {
                let nFrame=document.querySelector('#nFrame'+ i).value
                let vertF=document.querySelector('#vertF'+ i).value
                let orizzF=document.querySelector('#orizzF'+ i).value
                let sum = Number(vertF)+ Number(orizzF);  
                if(nFrame!= sum  ){
                        document.querySelector('#nFrame'+ i).style.borderColor = "red";
                    }else {
                            document.querySelector('#nFrame'+ i).style.borderColor = "gray";
                            okC++;
                        }
                    }        
                    if(okC==indexCorn){
                        form.submit()
                        } 
                    })  
                </script>
                @endpush
                @endsection