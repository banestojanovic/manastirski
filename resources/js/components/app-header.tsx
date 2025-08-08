import AppLogo from '@/components/app-logo';
import AppMainMenu from '@/components/app-main-menu';
import AppearanceToggleDropdown from '@/components/appearance-dropdown';

const AppHeader = () => {
    return (
        <header className={`sticky top-0 w-full bg-white z-10 py-4 border-b`}>
            <div className={`container mx-auto flex items-center justify-between`}>
                <div>
                    <AppLogo />
                </div>

                <div className={`flex items-center gap-2`}>
                    <AppMainMenu />
                    <AppearanceToggleDropdown />
                </div>
            </div>
        </header>
    );
};

export default AppHeader;
