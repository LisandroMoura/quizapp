export interface Quiz {
    id: number;
    title: string;
    description: string;
    type: string;
    body: String | null;
    numberOptions: number ;
    status  : string;
}