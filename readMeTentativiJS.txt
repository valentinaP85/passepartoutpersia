      // 	detailsHhtml = $(detailsHtml).click(QuizAnswerDelete);
			// 		$(params.id + " .answer-area .answer-wall").append(detailsHtml);
				
			// });
     
    
    // original.id = "details" + index;  //Assegna e incrementa il numero nell'ID
    // original.name = "details" + index; 
    console.log( objDetails);
    // qta.id = "qta" + index;
    // orizz.id = "orizz" + index; 
    // vert.id = "vert" + index;
    // rental_id.id = " rental_id" + index; 
    // // colorPass.id = "colorPass" + index;
    // passepartout.id = "passepartout" + index; 
    // fondo.id = "fondo" + index;
    // smontaggio.id = "smontaggio" + index; 
    // montaggio.id = "montaggio" + index;
    // qta.name = "qta" + index;
    // orizz.name = "orizz" + index; 
    // vert.name = "vert" + index;
    // rental_id.name = " rental_id" + index; 
    // //colorPass.name = "colorPass" + index;
    // passepartout.name = "passepartout" + index; 
    // fondo.name = "fondo" + index;
    // smontaggio.name = "smontaggio" + index; 
    // montaggio.name = "montaggio" + index;
 
 
  //________________________________________________
  // addButton.addEventListener('click',(e)=>{
    //   index++ 
    //   let box =document.getElementById('details').innerHTML;
    //   let node = document.createTextNode(box);
    //   function indexAttribute(attr) { 
      //     document.getElementById("newBox").innerHTML= box;
      //     console.log(index);                   //crea un nuovo box (+index) 
      //     if(attr.key=='name'){                 //sintassi errata
        //       let original= getAttribute(attr)
        //       setAttribute(attr, original+index)
        //     }  
        //   }
        
        //})
        // 
    // let clone = original.cloneNode(true);
    // let original = document.getElementById('details');
 
  // let orizz=document.getElementById('orizz');
  // let vert=document.getElementById('vert');
  // let rental_id= document.getElementById('rental_id');
  // //let colorPass=document.getElementById('colorPass');
  // let passepartout=document.getElementById('passepartout');
  // let fondo=document.getElementById('fondo');
  // let montaggio=document.getElementById('montaggio');
  // let smontaggio=document.getElementById('smontaggio');

_______________________________________________________________IMPORTANTE_______________________-

   //  let qta= document.getElementById('qta').value;
    // let orizz=document.getElementById('orizz').value;
    // let vert=document.getElementById('vert').value;
    // let rental_id= document.getElementById('rental_id').value;
    // //let colorPass=document.getElementById('colorPass');
    // let passepartout=document.getElementById('passepartout').value;
    // let fondo=document.getElementById('fondo').value;
    // let montaggio=document.getElementById('montaggio').value;
    // let smontaggio=document.getElementById('smontaggio').value;
    
    
    //     let data = {
      //     qta: qta,
      //     orizz: orizz,
      //     vert: vert,
      //     rental_id: rental_id,
      //     passepartout: passepartout,
      //     fondo: fondo,
      //     montaggio: montaggio,
      //     smontaggio: smontaggio,
      //  }
      // objDetails.push(data);
      
        // ___________________________________________________________________________________________________________
    // const timeElapsed = Date.now();
    // const today = new Date(timeElapsed);
    // today.toLocaleDateString();
    // function padTo2Digits(num) {
      //   return num.toString().padStart(2, '0');
      // }
      // function formatDate(date) {
        //   return [
        //   date.getFullYear(), 
        //   padTo2Digits(date.getMonth() + 2),
        //   padTo2Digits(date.getDate())
        //   ].join('-');
        // }
        // let dateStart =formatDate(new Date());
        //  let date1 = new Date(dal); 
        // let date2 = new Date(2019, 08, 09, 11, 45, 55); 
        // if (date1.getTime() < date2.getTime()) {
          //   console.log("date1 is lesser than date2"); 
          // }
          // else if (date1.getTime() > date2.getTime()) {
            //   console.log("date1 is greater than date2"); 
            // }    
            // else{
              //   console.log("both are equal"); 
              // }
              // console.log(date1);
              // let data = new Date();
              // let gg, mm, aaaa;
              // gg = padTo2Digits(data.getDate()) + "/";
              // mm = padTo2Digits(data.getMonth()) + 2 + "/";
              // aaaa = data.getFullYear();
              // let dateStart= aaaa+ gg + mm ;
              // let d = new Date(year, month, day); 
              // d.setMonth(d.getMonth() + 1); 
              // $data= strtotime("now");
              //   $final = date("Y-m-d", strtotime("+1 month", $data));
              // ________________________________________________________________________________________________________________
               let arrayReg=[];
  let uniqueReg=[]; 
  let reg=document.getElementById('regione');
  let arrayPro=[];
  let uniqueProv=[]; 
  let prov=document.getElementById('provincia');
  let arrayCap=[];
  let uniqueCap=[]; 
  let cap=document.getElementById('cap');




   
  
  
  function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
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
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
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
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
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
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
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
  
  /*An array containing all the country names in the world:*/
  var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
  
  
  UReg=['abruzzo', 'basilicata', 'calabria', 'campania', 'emilia romagna', 'friuli venezia giulia', 'lazio', 'liguria', 'lombardia', 'marche', 'molise', 'piemonte', 'puglia', 'sardegna', 'sicilia', 'toscana', 'trentino alto adige', 'umbria', "valle d'aosta", 'veneto']
  
  /*initiate the autocomplete function on the "paese" element, and pass along the countries array as possible autocomplete values:*/
  // autocomplete(document.getElementById("paese"), countries);
  autocomplete(document.getElementById("regione"), UReg);
  
  
   fetch('cap.json')
  .then(response => {
    if (!response.ok) {
      throw new Error("HTTP error " + response.status);
    }
    return response.json();
  })
  .then(dati =>{
    for (let i = 0; i < dati.length; i++) {
      let regione= dati[i].regione
      arrayReg.push(regione)
    }
    //____________________________-
    // let cap= dati[i].cap
    // arrayCap.push(cap) 
    // uniqueCap = [...new Set(arrayCap)].sort(); 
    //____________________________-
    
    uniqueReg = [...new Set(arrayReg)].sort(); 
    let temp1 =document.getElementById('template1').value;
    for (let j = 0; j < uniqueReg.length; j++) {
      let optionReg = document.createElement('OPTION');
      optionReg.setAttribute( "id","Reg"+[j] );
      optionReg.setAttribute( "value",uniqueReg[j] );
      optionReg.innerHTML =uniqueReg[j];
      reg.appendChild(optionReg);
    }  
    window.resetProvincia = function () {
      arrayPro=[];
      uniqueProv=[]; 
      if(document.getElementsByClassName( "aa" )){
        const x = document.querySelectorAll('.aa');
        x.forEach(e => {
          e.remove();
        }); 
      }
    }  
    console.log(arrayReg);
    console.log(uniqueReg);
    window.selezionaProvincia= function(){
      arrayPro=[];
      uniqueProv=[]; 
      for (let z = 0; z <dati.length; z++) {
        if(dati[z].regione== document.getElementById('template1').value){
          arrayPro.push(dati[z].provincia)
        }
      }
      uniqueProv = [...new Set(arrayPro)].sort(); 
      for (let j = 0; j < uniqueProv.length; j++) {
        let optionPro = document.createElement('OPTION');
        optionPro.setAttribute( "id","prov"+[j] );
        optionPro.classList.add('aa');
        optionPro.setAttribute( "value",uniqueProv[j] );
        optionPro.innerHTML =uniqueProv[j];
        prov.appendChild(optionPro);
      }  
    }  
    window.resetCap = function () {
      arrayCap=[];
      uniqueCap=[]; 
      if(document.getElementsByClassName( "cc" )){
        const x = document.querySelectorAll('.cc');
        x.forEach(e => {
          e.remove();
        }); 
      }
    } 
    window.selezionaCap= function(){
      arrayCap=[];
      uniqueCap=[]; 
      for (let k = 0; k <dati.length; k++) {
        if(dati[k].provincia== document.getElementById('template2').value){
          arrayCap.push(dati[k].cap)
        }
      }
      uniqueCap = [...new Set(arrayCap)].sort(); 
      for (let h = 0; h < uniqueCap.length; h++) {
        let optionCap = document.createElement('OPTION');
        optionCap.setAttribute( "id","cap"+[h] );
        optionCap.classList.add('cc');
        optionCap.setAttribute( "value",uniqueCap[h] );
        optionCap.innerHTML =uniqueCap[h];
        cap.appendChild(optionCap);
      }  
    }  
 })
  .catch(function () {
    this.dataError = true;
  })
  
  
  
  
  
  
  
  
  