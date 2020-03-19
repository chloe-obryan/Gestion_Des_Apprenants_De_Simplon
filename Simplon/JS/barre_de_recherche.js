function mafunction() {
    var tape, filtrer, recupere, tr_r, i, parcours;

tape=document.getElementById('barre');
filtrer=tape.value;
recupere=document.getElementById('tablea');
tr_r=document.getElementsByTagName('tr');

for (i= 0; i< tr_r.length; i++) {
    if(tr_r[i]){
        parcours=tr_r[i].textContent || tr_r[i].innerText;
        if (parcours.match(filtrer)) {
            tr_r[i].style.display="";
        }
        else {
            tr_r[i].style.display="none";
        }
    }
    
}

}
