import { Head } from '@inertiajs/react';

import AppearanceTabs from '@/legacy/components/appearance-tabs';
import HeadingSmall from '@/legacy/components/heading-small';
import { type BreadcrumbItem } from '@/types';

import AppLayout from '@/legacy/layouts/app-layout';
import SettingsLayout from '@/legacy/layouts/settings/layout';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Appearance settings',
        href: '/settings/appearance',
    },
];

export default function Appearance() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Appearance settings" />

            <SettingsLayout>
                <div className="space-y-6">
                    <HeadingSmall title="Appearance settings" description="Update your account's appearance settings" />
                    <AppearanceTabs />
                </div>
            </SettingsLayout>
        </AppLayout>
    );
}
