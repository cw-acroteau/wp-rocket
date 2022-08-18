import { test, expect } from '@playwright/test';
import { WP_USERNAME, WP_PASSWORD } from '../../../wp.config';
test.describe('Rocket License', () => {
    test('should authenticate rocket license', async ({ page }) => {
        // await page.goto('/wp-admin/options-general.php?page=wprocket');

        await page.goto('/wp-admin');
        // Fill username & password.
        // await page.locator('input[name="log"]').fill(WP_USERNAME);
        // await page.locator('input[name="pwd"]').fill(WP_PASSWORD);
        // Click login.
        // await page.locator('text=Log In').click();

        await expect(page).toHaveTitle(/WordPress/);
    });
});