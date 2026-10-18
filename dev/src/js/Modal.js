/*
export class Modal {
	constructor(params) {
		const defaultParams = {
			modal: '[data-modal]',
			btn: '[data-modal-btn]',
			btnAttr: 'data-modal-btn',
			activeClass: 'active-modal',
			closeBtn: '[data-modal-close]',
			modalBox: '[data-modal-box]',
		}

		this.params = { ...defaultParams, ...params };
		this.btns = document.querySelectorAll(this.params.btn);

		this.init();
	}

	init() {
		if (!this.btns.length) return;

		document.addEventListener('click', (e) => {

			// Открытие по кнопке
			if (e.target.closest(this.params.btn)) {
				const btn = e.target.closest(this.params.btn);
				if (btn.tagName === 'A') {
					e.preventDefault();
				}
				const id = btn.getAttribute(this.params.btnAttr);
				const modal = document.querySelector(`#${id}`);
				if (!modal) return;

				modal.classList.add(this.params.activeClass);
				document.documentElement.classList.add(this.params.activeClass);
			}

			// Закрытие по кнопке
			if (e.target.closest(this.params.closeBtn)) {
				const closeBtn = e.target.closest(this.params.closeBtn);
				const modal = closeBtn.closest(this.params.modal);
				if (!modal) return;
				
				modal.classList.remove(this.params.activeClass);
				document.documentElement.classList.remove(this.params.activeClass);
			}

			// Закрытие по клику вне модалки
			const modal = e.target.closest(this.params.modal);

			if (modal && !e.target.closest(this.params.modalBox)) {
				modal.classList.remove(this.params.activeClass);
				document.documentElement.classList.remove(this.params.activeClass);
			}
		})
	}
}
	*/
export class Modal {
	constructor(params) {
		const defaultParams = {
			modal: '[data-modal]',
			btn: '[data-modal-btn]',
			btnAttr: 'data-modal-btn',
			activeClass: 'active-modal',
			closeBtn: '[data-modal-close]',
			modalBox: '[data-modal-box]',
		}

		this.params = { ...defaultParams, ...params };
		this.btns = document.querySelectorAll(this.params.btn);
		this.modals = document.querySelectorAll(this.params.modal);

		this.init();
	}

	init() {
		if (!this.btns.length) return;

		// Клики
		document.addEventListener('click', (e) => {

			// Открытие по кнопке
			const btn = e.target.closest(this.params.btn);
			if (btn) {
				e.preventDefault();
				const id = btn.getAttribute(this.params.btnAttr);
				location.hash = id; // 👈 записываем хэш
				return;
			}

			// Закрытие по кнопке
			const closeBtn = e.target.closest(this.params.closeBtn);
			if (closeBtn) {
				this.closeAll();
				history.pushState('', document.title, window.location.pathname + window.location.search);
				return;
			}

			// Закрытие по клику вне модалки
			const modal = e.target.closest(this.params.modal);
			if (modal && !e.target.closest(this.params.modalBox)) {
				this.closeAll();
				history.pushState('', document.title, window.location.pathname + window.location.search);
			}
		});

		// Отслеживание хэша
		window.addEventListener('hashchange', () => {
			this.openFromHash();
		});

		// Открытие при загрузке страницы
		this.openFromHash();
	}

	openFromHash() {
		this.closeAll();

		const hash = location.hash.replace('#', '');
		if (!hash) return;

		const modal = document.getElementById(hash);
		
		if (!modal) return;
		
		if (!modal.hasAttribute('data-modal')) return;
		

		modal.classList.add(this.params.activeClass);
		document.documentElement.classList.add(this.params.activeClass);
	}

	closeAll() {
		this.modals.forEach(modal => {
			modal.classList.remove(this.params.activeClass);
		});
		document.documentElement.classList.remove(this.params.activeClass);
	}
}
