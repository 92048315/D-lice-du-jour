function verif() {
    nom=document.getElementById("nom").value;
  if (/[A-Z]/.test( nom[0]))
    {

    }
    else
    {
        alert('1er lettre nom doit etre maj');
        return false;
    }

}