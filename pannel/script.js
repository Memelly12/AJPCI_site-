const DashImmo = document.getElementById("DashImmo");
const DashMar = document.getElementById("DashMar");
const DashVeh = document.getElementById("DashVeh");
const Boite = document.getElementById("Boite");

function afficherFormulaireAjout() {
  document.getElementById("formulaire_ajout").style.display = "block";
  document.getElementById("container").style.display = "none";
  document.getElementById("formulaire_modif").style.display = "none";
  document.getElementById("reception").style.display = "none";
}

function afficherTableauRepertoire() {
  document.getElementById("formulaire_ajout").style.display = "none";
  document.getElementById("container").style.display = "block";
  document.getElementById("formulaire_modif").style.display = "none";
  document.getElementById("reception").style.display = "none";
}

function afficherBoiteReception() {
  document.getElementById("reception").style.display = "block";
  document.getElementById("formulaire_ajout").style.display = "none";
  document.getElementById("container").style.display = "none";
  document.getElementById("formulaire_modif").style.display = "none";
}
function activeDashImmo() {
  DashImmo.classList.add("active");
  DashMar.classList.remove("active");
  DashVeh.classList.remove("active");
  Boite.classList.remove("active");
}

function activeDashMar() {
  DashImmo.classList.remove("active");
  DashVeh.classList.remove("active");
  DashMar.classList.add("active");
  Boite.classList.remove("active");
}
function activeBoite() {
  DashImmo.classList.remove("active");
  Boite.classList.add("active");
  DashVeh.classList.remove("active");
  DashMar.classList.remove("active");
}
function activeVeh() {
  DashImmo.classList.remove("active");
  DashMar.classList.remove("active");
  Boite.classList.remove("active");
  DashVeh.classList.add("active");
}
