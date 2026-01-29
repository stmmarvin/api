jQuery(document).ready(function ($) {
    // Attach click event to the dismiss button
    $(document).on('click', '.welcome-notice button.notice-dismiss', function () {
        // Dismiss the notice via AJAX
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'online_documentation_dismissed_notice',
            },
            success: function () {
                // Remove the notice on success
                $('.notice[data-notice="example"]').remove();
            }
        });
    });
});


// Plugin – AI Content Writer plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const online_documentation_button = document.getElementById('install-activate-button');

    if (!online_documentation_button) return;

    online_documentation_button.addEventListener('click', function (e) {
        e.preventDefault();

        const online_documentation_redirectUrl = online_documentation_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const online_documentation_checkData = new FormData();
        online_documentation_checkData.append('action', 'check_plugin_activation');

        fetch(installPluginData.ajaxurl, {
            method: 'POST',
            body: online_documentation_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = online_documentation_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                online_documentation_button.textContent = 'Installing & Activating...';

                const online_documentation_installData = new FormData();
                online_documentation_installData.append('action', 'install_and_activate_required_plugin');
                online_documentation_installData.append('_ajax_nonce', installPluginData.nonce);

                fetch(installPluginData.ajaxurl, {
                    method: 'POST',
                    body: online_documentation_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = online_documentation_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        online_documentation_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    online_documentation_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
