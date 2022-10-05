import { test, expect } from '@playwright/test';

/**
 * Local deps.
 */
import { preload } from '../../common/sections/preload';
import { dashboard } from '../../common/sections/dashboard';
import { save_settings } from '../../../utils/helpers';

test.describe( 'Preload', () => {
    test('should display preload notice', async ( { page } ) => {

        await page.goto('/wp-admin/options-general.php?page=wprocket#dashboard');

        const data = {
            'preload': new preload(page),
            'dashboard': new dashboard(page),
            'locator': page.locator('#rocket-notice-preload-processing'),
            'expected': 'The preload service is now active'
        };

        await on_activation(data);
        await when_preload_enabled(page, data);
        await when_clear_cache_and_preload_admin_bar(page, data);
        await when_clear_cache_and_preload_settings(page, data);
    });
});

const on_activation = async (data) => {
    await expect(data.locator).toContainText(data.expected);
}

const when_preload_enabled = async (page, data) => {
    await data.preload.visit();
    // Disable preload
    await data.preload.togglePreload();
    await save_settings(page);

    // Re-enable
    await data.preload.togglePreload();
    await save_settings(page);

    await expect(data.locator).toContainText(data.expected);
}

const when_clear_cache_and_preload_admin_bar = async (page, data) => {
    await page.locator('#wp-admin-bar-wp-rocket').hover();
    await page.locator('#wp-admin-bar-purge-all a').click();
    await expect(data.locator).toContainText(data.expected);
}

const when_clear_cache_and_preload_settings = async (page, data) => {
    await data.dashboard.visit();
    await data.dashboard.clearCacheAndPreload();

    await expect(data.locator).toContainText(data.expected);
}