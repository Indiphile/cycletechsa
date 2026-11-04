/* CycleTechSA theme — small, dependency-free enhancements. */
(function () {
	'use strict';

	// Mobile menu toggle.
	var toggle = document.querySelector('.nav-toggle');
	var nav = document.getElementById('primary-nav');
	if (toggle && nav) {
		var openIcon = toggle.querySelector('.nav-toggle__open');
		var closeIcon = toggle.querySelector('.nav-toggle__close');

		var setOpen = function (open) {
			nav.classList.toggle('is-open', open);
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			if (openIcon && closeIcon) {
				openIcon.hidden = open;
				closeIcon.hidden = !open;
			}
		};

		toggle.addEventListener('click', function () {
			setOpen(!nav.classList.contains('is-open'));
		});

		// Close after choosing a link (anchor links on the homepage).
		nav.addEventListener('click', function (e) {
			if (e.target.closest('a')) {
				setOpen(false);
			}
		});

		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && nav.classList.contains('is-open')) {
				setOpen(false);
				toggle.focus();
			}
		});

		window.addEventListener('resize', function () {
			if (window.innerWidth > 960 && nav.classList.contains('is-open')) {
				setOpen(false);
			}
		});
	}

	// Background videos: respect reduced motion, only play while on screen.
	var videos = document.querySelectorAll('video.cts-bg-video');
	if (!videos.length) {
		return;
	}

	var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var saveData = navigator.connection && navigator.connection.saveData;

	videos.forEach(function (video) {
		video.muted = true;

		if (reduceMotion || saveData) {
			video.removeAttribute('autoplay');
			video.pause();
			video.preload = 'none';
			return;
		}

		var play = function () {
			var p = video.play();
			if (p && typeof p.catch === 'function') {
				p.catch(function () { /* autoplay blocked: poster/overlay still show */ });
			}
		};

		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						if (video.preload === 'none') {
							video.preload = 'auto';
							video.load();
						}
						play();
					} else {
						video.pause();
					}
				});
			}, { rootMargin: '200px 0px' });
			io.observe(video);
		} else {
			play();
		}
	});
})();
