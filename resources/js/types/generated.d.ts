declare namespace App {
export type UserRole = 1 | 2 | 3;
}
declare namespace App.Data {
export type DioceseData = {
id: number;
name: string;
slug: string;
description: string | null;
other: Array<any> | null;
image: any | null;
};
}
declare namespace App.Support.Data {
export type DataResourceContract = {
};
}
