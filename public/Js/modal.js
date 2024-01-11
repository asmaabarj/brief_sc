
  document.addEventListener('DOMContentLoaded', function () {
    const modalButton = document.querySelector('[data-modal-toggle="crud-modal"]');
    const modal = document.getElementById('crud-modal');
    const closeButton = modal.querySelector('[data-modal-toggle="crud-modal"]');

    modalButton.addEventListener('click', function () {
      modal.classList.toggle('hidden');
      document.body.classList.toggle('overflow-hidden');
    });

    closeButton.addEventListener('click', function () {
      modal.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    });

    window.addEventListener('click', function (e) {
      if (e.target === modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      }
    });
  });
