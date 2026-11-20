document.addEventListener('DOMContentLoaded', function () {
    const botonsEditar = document.querySelectorAll('[data-modal-toggle="edit-modal"]');

    botonsEditar.forEach(function (boton) {
        boton.addEventListener('click', function () {
            const cicleId = this.getAttribute('data-cicle-id');
            const cicleCodi = this.getAttribute('data-cicle-codi');
            const cicleNom = this.getAttribute('data-cicle-nom');

            // Omplir els camps del modal amb les dades del cicle
            document.getElementById('edit-codi').value = cicleCodi;
            document.getElementById('edit-nom').value = cicleNom;

            const updateForm = document.getElementById('edit-form');
            updateForm.action = '/cicles/' + cicleId; // Actualitzar l'atribut action del formulari amb l'ID del cicle
        });
    });
});