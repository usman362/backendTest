import GroupByOwnersService from './GroupByOwnersService';

test('group by owners test', () => {
  const service = new GroupByOwnersService();
  const files = {
    "insurance.txt": "Company A",
    "letter.docx": "Company A",
    "Contract.docx": "Company B"
  };
  const expectedResult = {
    "Company A": ["insurance.txt", "letter.docx"],
    "Company B": ["Contract.docx"]
  };
  expect(service.groupByOwners(files)).toEqual(expectedResult);
});
