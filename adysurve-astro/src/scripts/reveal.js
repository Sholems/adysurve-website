const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!prefersReducedMotion) {
  const revealTargets = [
    ...document.querySelectorAll('main > section'),
    ...document.querySelectorAll('main > section article'),
    ...document.querySelectorAll('main > section .container-page > div'),
  ];

  const uniqueTargets = [...new Set(revealTargets)].filter(
    (target) => !target.closest('[x-cloak]')
  );

  uniqueTargets.forEach((target, index) => {
    if (!target.hasAttribute('data-reveal')) {
      target.setAttribute('data-reveal', 'fade-up');
    }

    target.style.setProperty(
      '--reveal-delay',
      `${Math.min(index % 6, 5) * 70}ms`
    );
  });

  document.documentElement.classList.add('reveal-ready');

  const revealObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) {
          return;
        }

        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    },
    {
      rootMargin: '0px 0px -10% 0px',
      threshold: 0.12,
    }
  );

  uniqueTargets.forEach((target) => revealObserver.observe(target));

  const revealVisibleTargets = () => {
    uniqueTargets.forEach((target) => {
      if (target.classList.contains('is-visible')) {
        return;
      }

      const rect = target.getBoundingClientRect();

      if (rect.top < window.innerHeight * 0.92 && rect.bottom > 0) {
        target.classList.add('is-visible');
        revealObserver.unobserve(target);
      }
    });
  };

  requestAnimationFrame(revealVisibleTargets);
  window.addEventListener('load', revealVisibleTargets, { once: true });
}
