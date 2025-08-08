import { Button } from '@/components/ui/button';
import { NavigationMenu, NavigationMenuItem, NavigationMenuLink, NavigationMenuList } from '@/components/ui/navigation-menu';
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import type { NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { MenuIcon, XIcon } from 'lucide-react';
import { useState } from 'react';
import { useTranslation } from 'react-i18next';

const navItems: NavItem[] = [
    {
        id: 'dioceses',
        title: 'nav.dioceses',
        description: 'nav_description.dioceses',
        href: '/',
    },
    {
        id: 'parishes',
        title: 'nav.parishes',
        description: 'nav_description.parishes',
        href: '/',
    },
    {
        id: 'communities',
        title: 'nav.communities',
        description: 'nav_description.communities',
        href: '/',
    },
];

const AppMainMenu = () => {
    const [open, setOpen] = useState<boolean>(false);

    const { t } = useTranslation();

    return (
        <div>
            <NavigationMenu className={`hidden lg:flex`}>
                <NavigationMenuList>
                    {navItems.map((item) => (
                        <NavigationMenuItem key={item.id} className="flex items-center">
                            {item.icon && <item.icon className="size-4" />}
                            {item.id !== 'home' && (
                                <NavigationMenuLink asChild>
                                    <Link href={item.href} className={`font-medium`}>
                                        {t(item.title)}
                                    </Link>
                                </NavigationMenuLink>
                            )}
                        </NavigationMenuItem>
                    ))}
                </NavigationMenuList>
            </NavigationMenu>

            <div className={`lg:hidden`}>
                <Button variant="ghost" className={`has-[>svg]:px-0`} onClick={() => setOpen(true)}>
                    {open ? <XIcon className={`size-5`} /> : <MenuIcon className={`size-5`} />}
                </Button>

                <Popover open={open} onOpenChange={setOpen}>
                    <PopoverTrigger className={`sr-only`}>Open menu</PopoverTrigger>
                    <PopoverContent
                        side={`bottom`}
                        className={`no-scrollbar relative top-[56px] z-50 h-(--radix-popper-available-height) w-(--radix-popper-available-width) origin-(--radix-popover-content-transform-origin) overflow-y-auto rounded-none border border-none bg-background/90 p-0 text-popover-foreground shadow-none outline-hidden backdrop-blur duration-100 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=closed]:zoom-out-95 data-[state=open]:animate-in data-[state=open]:fade-in-0 data-[state=open]:zoom-in-95`}
                    >
                        <div className="flex flex-col gap-2 p-4">
                            {navItems.map((item) => (
                                <Link
                                    key={item.id}
                                    href={item.href}
                                    className="flex items-center gap-2 rounded px-3 py-2 text-base font-medium hover:bg-accent"
                                    onClick={() => setOpen(false)}
                                >
                                    {item.icon && <item.icon className="size-4" />}
                                    {t(item.title)}
                                </Link>
                            ))}
                        </div>
                    </PopoverContent>
                </Popover>
            </div>
        </div>
    );
};

export default AppMainMenu;
