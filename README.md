Creare pulsante "Torna indietro" come semplice link

Per inserire un link semplice all'interno della nostra pagina web che ci porti selezionandolo alla pagina web precedentemente visitata posizionarsi dove vogliamo inserirlo e digitiamo il seguente codice HTML:

<a href="javascript:history.go(-1)" 
onMouseOver="self.status=document.referrer;return true">
Torna indietro</a>
Produrremo:

Torna indietro



Creare pulsante "Torna indietro" come pulsante semplice

Per inserire un pulsante semplice all'interno della nostra pagina web che ci porti selezionandolo alla pagina web precedentemente visitata posizionarsi dove vogliamo inserirlo e digitiamo il seguente codice HTML:

<form>
<input type="button" value="Torna indietro" 
onClick="history.go(-1);return true;" 
name="button">
</form>
Produrremo:




    // Route::post('/information/store', [InformationController::class, 'store'])->name('information.store');
    // Route::post('/information/{information}/update', [InformationController::class, 'update'])->name('information.update');
    // Route::get('/information/{information}/edit', [InformationController::class, 'edit'])->name('information.edit');

    // Route::post('/notices/store', [NoticeController::class, 'store'])->name('notices.store');
    // Route::post('/notices/{notice}/update', [NoticeController::class, 'update'])->name('notices.update');
    // Route::get('/notices/{notice}/edit', [NoticeController::class, 'edit'])->name('notices.edit');