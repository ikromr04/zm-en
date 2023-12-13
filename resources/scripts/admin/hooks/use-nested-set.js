import { useEffect, useRef } from 'react';

export const useNestedSet = (onChange) => {
  const ref = useRef(null);

  const handleDocumentClick = (evt) => {
    if (evt.target.classList.contains('nested-list__draggable')) {
      evt.target.closest('.nested-list__item').classList.toggle('nested-list__item--expanded');
    }
  };

  useEffect(() => {
    if (ref.current) {
      $('.nested-list').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        excludeRoot: true,
        maxLevels: 2,
        isTree: true,
        expandOnHover: 700,
        startCollapsed: false,
        branchClass: 'nested-list__item--branch',
        expandedClass: 'nested-list__item--expanded',
        leafClass: 'nested-list__item--leaf',
        hoveringClass: 'nested-list__item--hover',
        relocate: () => onChange(),
      });
    }

    document.addEventListener('click', handleDocumentClick);

    return () => {
      document.removeEventListener('click', handleDocumentClick);
    };
  }, [onChange]);

  return ref;
};
