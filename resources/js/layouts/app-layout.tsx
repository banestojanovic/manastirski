import type { PropsWithChildren } from 'react';
import AppHeader from '@/components/app-header';

const AppLayout = ({ children }: PropsWithChildren) => {
    // When server-side rendering, we only render the layout on the client...
    if (typeof window === 'undefined') {
        return null;
    }

    return (
        <div className={`xl:px-0 mx-auto xl:max-w-[1400px] w-full max-w-full`}>
            <AppHeader />

            <main>{children}</main>
        </div>
    );
};

export default AppLayout;
