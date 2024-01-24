jQuery(document).ready(function ($) {
    // Beaver Builder overlay toggle
    if ($('body').hasClass('fl-builder-edit')) {
        const toggleBtnId = '#toggle-bb-overlays';

        if ($(toggleBtnId).length === 0) {
            if (typeof FLBuilder !== 'undefined' && FLBuilder.UIIFrame && FLBuilder.UIIFrame.getIFrameWindow) {
                const win = FLBuilder.UIIFrame.getIFrameWindow();

                const $toggleBtn = $('<button>', {
                    id: 'toggle-bb-overlays',
                    text: 'Hide Overlays',
                    class: 'fl-builder-button',
                });

                $('.fl-builder-bar-actions').append($toggleBtn);

                $toggleBtn.click(function () {
                    const bodyInIframe = $('body', win.document);
                    bodyInIframe.toggleClass('fl-overlays-hidden');
                    const overlaysHidden = bodyInIframe.hasClass('fl-overlays-hidden');
                    $(this).text(bodyInIframe.hasClass('fl-overlays-hidden') ? 'Show Overlays' : 'Hide Overlays').toggleClass('overlay-hidden', overlaysHidden);
                });
            } else {
                console.error('FLBuilder UI Frame is not available.');
            }
        }
    }
});
