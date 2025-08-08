declare namespace App {
export type CommunityType = 1 | 2;
export type UserRole = 1 | 2 | 3;
export type VideoProvider = 1 | 2;
}
declare namespace App.Data {
export type CommunityData = {
id: number;
name: string;
slug: string;
description: string | null;
other: Array<any> | null;
image: any | null;
user: App.Data.UserData | null;
parish: App.Data.ParishData | null;
};
export type DioceseData = {
id: number;
name: string;
slug: string;
description: string | null;
other: Array<any> | null;
image: any | null;
};
export type ParishData = {
id: number;
name: string;
slug: string;
description: string | null;
other: Array<any> | null;
diocese: App.Data.DioceseData | null;
image: any | null;
};
export type UserData = {
};
}
declare namespace App.Support.Data {
export type DataResourceContract = {
};
}
