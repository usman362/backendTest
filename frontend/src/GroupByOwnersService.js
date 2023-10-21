class GroupByOwnersService {
    groupByOwners(files) {
      const result = {};
      for (const [file, owner] of Object.entries(files)) {
        if (!result[owner]) {
          result[owner] = [];
        }
        result[owner].push(file);
      }
      return result;
    }
  }

export default GroupByOwnersService;
