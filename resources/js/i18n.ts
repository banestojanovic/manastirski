// oxlint-disable-next-line ban-ts-comment
// @ts-expect-error
import locales from '@lang/locales.json';
import i18n from 'i18next';
import HttpBackend from 'i18next-http-backend';
import { initReactI18next } from 'react-i18next';

i18n.use(HttpBackend)
    .use(initReactI18next)
    .init({
        lng: 'en',
        fallbackLng: 'en',
        debug: process.env.NODE_ENV === 'development',
        resources: locales,
    });

export default i18n;
