import AppLayout from '@/layouts/app-layout';
import { ReactNode } from 'react';
import { useTranslation } from 'react-i18next';

const Home = ({ dioceses }: { dioceses: App.Data.DioceseData[] }) => {
    console.log('Dioceses:', dioceses);

    const { t } = useTranslation();

    return (
        <div className={`container mx-auto`}>
            <div className={`my-20`}>
                <h2 className={`mb-4 text-2xl font-medium leading-tight sm:text-3xl lg:text-4xl text-pretty`}>Izdvojeni video snimci</h2>
                <p className={`text-foreground text-base text-balance sm:text-lg`}>Na ovom mestu mozete pogledati izdvojena obraćanja, predvanja i propovedi za prethodni period</p>

                <div
                    className={`mt-12 dark:bg-sand-dark-3 h-auto items-stretch overflow-hidden rounded-[18px] bg-stone-100 dark:bg-white/10 p-2 lg:h-[596px] lg:min-h-[500px]`}
                >
                    <div className={`relative size-full overflow-hidden rounded-lg bg-white dark:bg-black/80 aspect-video`}>
                        <iframe
                            width="100%"
                            height="100%"
                            src="https://www.youtube.com/embed/2hqngTSrFsM"
                            title="YouTube video player"
                            frameBorder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowFullScreen
                        ></iframe>
                    </div>
                </div>
            </div>

            <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                {dioceses.map((diocese: App.Data.DioceseData) => (
                    <div key={diocese.id} className="diocese-item">
                        <img src={diocese.image.original_url} alt="" />
                        <h2>{diocese.name}</h2>
                        <p>{diocese.description}</p>
                    </div>
                ))}
            </div>
        </div>
    );
};

Home.layout = (page: ReactNode) => <AppLayout>{page}</AppLayout>;

export default Home;
