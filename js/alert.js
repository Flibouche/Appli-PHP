// Sélectionne l'élément avec l'ID 'liveAlertPlaceholder' et le stocke dans la variable alertPlaceholder
const alertPlaceholder = document.getElementById('liveAlertPlaceholder');

// Définit une fonction nommée appendAlert qui prend deux paramètres : message et type
const appendAlert = (message, type) => {
  // Crée un élément <div> pour envelopper l'alerte
  const wrapper = document.createElement('div');
  // Remplit le contenu HTML de l'élément <div> avec une alerte Bootstrap construite dynamiquement en utilisant les paramètres message et type
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`, // La classe 'alert' et la classe 'alert-dismissible' sont utilisées pour styliser l'alerte et la rendre refermable
    `   <div>${message}</div>`, // Affiche le message passé en paramètre dans l'alerte
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>', // Bouton de fermeture de l'alerte
    '</div>'
  ].join(''); // Utilise la méthode join() pour convertir le tableau en chaîne de caractères

  // Ajoute l'élément wrapper (contenant l'alerte) à l'élément avec l'ID 'liveAlertPlaceholder'
  alertPlaceholder.append(wrapper);
};

// Sélectionne l'élément avec l'ID 'liveAlertBtn' et le stocke dans la variable alertTrigger
const alertTrigger = document.getElementById('liveAlertBtn');

// Vérifie si alertTrigger existe
if (alertTrigger) {
  // Ajoute un écouteur d'événements de clic à l'élément alertTrigger
  alertTrigger.addEventListener('click', () => {
    // Lorsque l'élément alertTrigger est cliqué, appelle la fonction appendAlert avec le message "Votre produit a bien été enregistré !" et le type 'success'
    appendAlert('Votre produit a bien été enregistré !', 'success');
  });
}
