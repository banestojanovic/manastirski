import AppLayout from '@/layouts/app-layout';
import { ReactNode } from 'react';
import { useTranslation } from 'react-i18next';

const Home = ({ dioceses }: { dioceses: App.Data.DioceseData[] }) => {
    console.log('Dioceses:', dioceses);

    const { t } = useTranslation();

    return (
        <div>
            <h1>{t('welcome')}</h1>

            <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {dioceses.map((diocese: App.Data.DioceseData ) => (
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
