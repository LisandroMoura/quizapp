export interface Quiz {
    id: number;
    title: string;
    description: string;
    type: string;
    body: string | null;
    numberOptions: number ;
    status  : string;
}