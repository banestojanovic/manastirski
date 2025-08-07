import type { PropsWithChildren } from 'react';

const AppLayout = ({ children }: PropsWithChildren) => {
    // When server-side rendering, we only render the layout on the client...
    if (typeof window === 'undefined') {
        return null;
    }

    return (
        <div className={`container mx-auto px-4`}>
            <main>{children}</main>
        </div>
    );
};

export default AppLayout;
